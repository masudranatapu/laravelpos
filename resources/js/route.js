import Dashboard from './components/Dashboard.vue';
import ListAppointment from './components/Pages/Appointment/list_appointment.vue';
import ListUser from './components/Pages/User/user.vue';
import Suppliers from './components/Pages/Suppliers/suppliers.vue';
import Settings from './components/Pages/Settings/settings.vue';
import Profile from './components/Pages/Profile/profile.vue';

export default [
    {
        path: '/admin/dashboard',
        name: 'admin.dashboard',
        component: Dashboard,
    },
    {
        path: '/admin/suppliers',
        name: 'admin.suppliers',
        component: Suppliers,
    },
    {
        path: '/admin/appointment',
        name: 'admin.appointment',
        component: ListAppointment,
    },
    {
        path: '/admin/users',
        name: 'admin.users',
        component: ListUser,
    },
    {
        path: '/admin/settings',
        name: 'admin.settings',
        component: Settings,
    },
    {
        path: '/admin/profile',
        name: 'admin.profile',
        component: Profile,
    }
]