<template>
    <Main>
        <main class="flex-1 p-6 bg-gray-100">
            <div class="mb-4 flex items-center justify-between">
                <input type="text" placeholder="Поиск по марке" class="border rounded-lg p-2 w-1/3"/>

            </div>
            <div class="space-x-2">
                <button class="bg-red-600 text-white px-4 py-2 rounded">ДОБАВИТЬ</button>
                <button class="bg-red-600 text-white px-4 py-2 rounded">ИЗМЕНИТЬ</button>
                <button class="bg-red-600 text-white px-4 py-2 rounded">УДАЛИТЬ</button>
                <button class="bg-red-600 text-white px-4 py-2 rounded">СОХРАНИТЬ</button>
                <button class="bg-red-600 text-white px-4 py-2 rounded">ОТМЕНИТЬ</button>
            </div>

            <div class="bg-white shadow-md rounded-lg p-4">
                <table class="w-full border-collapse">
                    <thead class="bg-gray-200">
                    <tr>
                        <th class="border px-4 py-2">Код</th>
                        <th class="border px-4 py-2">Марка</th>
                        <th class="border px-4 py-2">Номер</th>
                        <th class="border px-4 py-2">Активен</th>
                        <th class="border px-4 py-2">Время и дата изменения</th>
                        <th class="border px-4 py-2">Пользователь</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr v-for="loader in loaders">
                        <td class="border px-4 py-2">
                            <Link :href="route('loaders_breaking.show', loader.id )">{{ loader.id }}</Link>

                        </td>

                        <td class="border px-4 py-2">
                            <Link :href="route('loaders_breaking.show', loader.id )">{{ loader.Marka }}</Link>
                        </td>

                        <td class="border px-4 py-2">
                            <Link :href="route('loaders_breaking.show', loader.id )">{{ loader.RegNumber }}</Link>
                        </td>
                        <td class="border px-4 py-2">
                            <div class="flex items-center">
                                <span class="ml-2">{{ loader.IsActive === 1 ? 'Активен' : 'Не активен' }}</span>
                            </div>
                        </td>
                        <td class="border px-4 py-2">{{ loader.Updated_When }}</td>
                        <td class="border px-4 py-2">{{ loader.user.name }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </Main>
</template>


<script setup>
import {Link} from "@inertiajs/vue3";
import Main from "@/Pages/Home/Main.vue";
import {onMounted} from "vue";

const props = defineProps(['loaders']);

onMounted(function () {
    // console.log(props.loaders)
})

</script>

<style scoped>

</style>
