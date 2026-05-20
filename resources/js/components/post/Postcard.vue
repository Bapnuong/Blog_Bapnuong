<script setup>
import { ref } from 'vue'
const props = defineProps({
    post: Object,
    canEdit: Boolean
})
</script>

<template>
    <div
            class="
                bg-white/80
                backdrop-blur-xl
                rounded-[35px]
                shadow-2xl
                p-10
                border border-white/50
            "
        >

            <div class="flex items-center gap-4 mb-8">



                    <img v-if="post.user.avatar" :href="`/users/${post.user.id}`" :src="`/storage/${post.user.avatar}`" class="
                            w-16
                            h-16
                            rounded-full
                            object-cover
                            border-2
                            border-orange-400
                        "
                    >



                    <img
                    v-else :href="`/users/${post.user.id}`"
                        src="https://ui-avatars.com/api/?name={{ post.user.name }}"
                        class="
                            w-16
                            h-16
                            rounded-full
                            border-2
                            border-orange-400
                        "
                    >


                <div>

                    <p class="text-2xl font-black text-gray-800">
                        {{ post.title }}
                    </p>

                    <div class="flex items-center gap-2 mt-1">

                        <p class="text-gray-500">
                            By {{ post.user.name }}
                        </p>

                        <span class="text-gray-300">•</span>

                        <p class="text-gray-400 text-sm">
                            {{ new Date(post.created_at).toLocaleString() }}
                        </p>

                    </div>

                </div>

            </div>


            <img
                v-if="post.image"
                :src="`/storage/${post.image}`"
                    class="
                        w-full
                        rounded-3xl
                        mb-8
                        max-h-[600px]
                        object-cover
                    "
                >



            <div
                class="
                    text-gray-700
                    text-xl
                    leading-relaxed
                    whitespace-pre-line
                "
            >
                {{ post.content }}
            </div>



            <div class="flex gap-4 mt-10">

                <div
                    class="
                        bg-pink-100
                        text-pink-500
                        px-5
                        py-3
                        rounded-2xl
                        font-semibold
                    "
                >
                    ❤️ {{ post.likes.length }} Likes
                </div>

                <div
                    class="
                        bg-blue-100
                        text-blue-500
                        px-5
                        py-3
                        rounded-2xl
                        font-semibold
                    "
                >
                    💬 {{ post.comments.length }} Comments
                </div>

            </div>

        </div>
</template>
