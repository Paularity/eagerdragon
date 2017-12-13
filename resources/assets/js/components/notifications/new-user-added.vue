<template>
    <li class="notifications new">
        <a href="" data-toggle="dropdown" @click="markAsRead()">
            <i class="fa fa-bell-o"></i>
            <sup>
              <span class="counter">{{ totalNotifications }}</span>
            </sup>
        </a>
        <div class="dropdown-menu notifications-dropdown-menu">
            <ul v-if="notifications.length" class="notifications-container">
                <li  v-for="notification in notifications">
                    <a :href="notification.data.link"
                        class="notification-item">
                        <div class="body-col">
                            <p>
                                <span class="accent">
                                {{notification.data.message}}
                                </span>
                            </p>
                        </div>
                    </a>
                </li>
            </ul>
            <ul v-else class="notifications-container">
                <li>
                    <div class="body-col">
                        <p>
                            <span class="accent">
                            No new notifications...
                            </span>
                        </p>
                    </div>
                </li>
            </ul>
            <footer>
                <ul>
                    <li>
                        <a href="/notifications"> View All Previous Notifications </a>
                    </li>
                </ul>
            </footer>
        </div>
    </li>
</template>

<script>
    export default {
        data() {
            return {
                notifications: [],
                totalNotifications: 0,
            }
        },
        mounted() {
            const self = this;
            const user = document.head.querySelector('meta[name="user"]');

            Echo.private('App.User.' + user.content)
            .notification((notification) => {
                self.updateNotifications(notification);
            });

            self.getUserNotifications();
        },
        methods: {
            getUserNotifications() {
                const self = this;

                axios.get('/notifications')
                .then((response) => {
                    self.notifications = response.data.notifications;
                    self.totalNotifications += response.data.count;
                });
            },
            updateNotifications(notification) {
                this.notifications.unshift({data: notification});

                this.totalNotifications += 1;
            },
            markAsRead() {
                const self = this;

                if (self.totalNotifications == 0) {
                    return false;
                }
                axios.post('/mark-read-notifications')
                .then((response) => {
                    self.totalNotifications = 0;
                });

            }
        }
    }
</script>
