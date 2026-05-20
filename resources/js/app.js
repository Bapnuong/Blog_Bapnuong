import './bootstrap'

import { createApp } from 'vue'

import Navbar from './components/layout/Navbar.vue'
import PostCard from './components/post/PostCard.vue'

/*
|--------------------------------------------------------------------------
| NAVBAR
|--------------------------------------------------------------------------
*/

if (document.getElementById('navbar-app'))
{
    const navbarApp = createApp({})

    navbarApp.component(
        'navbar-component',
        Navbar
    )

    navbarApp.mount('#navbar-app')
}

/*
|--------------------------------------------------------------------------
| POST CARD
|--------------------------------------------------------------------------
*/

if (document.getElementById('post-card-app'))
{
    const postCardApp = createApp({})

    postCardApp.component(
        'post-card',
        PostCard
    )

    postCardApp.mount('#post-card-app')
}
