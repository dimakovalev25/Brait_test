<template>
    <div class="flex flex-col h-screen">
        <header class="bg-red-600 text-white p-4 flex justify-between items-center">
            <h1 class="text-lg font-semibold">ГРАНИТ</h1>
            <button class="bg-white text-red-600 px-4 py-2 rounded">ПРОФИЛЬ</button>
        </header>

        <div class="flex flex-1">
            <nav class="bg-gray-300 text-black w-64 p-4">
                <ul>
                    <li class="mb-2"><a href="#" class="hover:bg-gray-400 block p-2 rounded">Пользователи</a></li>
                    <li class="mb-2"><a href="#" class="hover:bg-gray-400 block p-2 rounded">Уведомления и
                        напоминания</a></li>
                    <li class="mb-2"><a href="#" class="hover:bg-gray-400 block p-2 rounded">Настройки АИС ОГПА</a></li>

                    <Link :href="route('loaders.show')">

                        <li class="mb-2"><a href="#" class="hover:bg-gray-400 block p-2 rounded">Справочник
                            погрузчиков</a></li>
                    </Link>

                    <li class="mb-2"><a href="#" class="hover:bg-gray-400 block p-2 rounded">Резервное копирование</a>
                    </li>
                    <li class="mb-2"><a href="#" class="hover:bg-gray-400 block p-2 rounded">Справочники</a></li>
                </ul>
            </nav>

          <slot/>
        </div>
    </div>
</template>

<script setup>
import {Link} from "@inertiajs/vue3";
const props = defineProps(['loaders']);

</script>

<style scoped>


</style>
