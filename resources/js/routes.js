import AllLists from './components/AllList.vue';
import EditList from './components/EditList.vue';
 
export const routes = [
    {
        name: 'home',
        path: '/',
        component: AllLists
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditList
    }
];