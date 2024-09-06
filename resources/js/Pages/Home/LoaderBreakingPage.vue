<template>
    <Main>
        <main class="flex flex-col p-6 bg-gray-100">

            <div v-if="isModalOpen" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center z-50">
                <div class="bg-white rounded-lg p-6 shadow-lg w-1/3">
                    <h2 class="text-xl font-bold mb-4">Добавить погрузчик</h2>

                    <form @submit.prevent="addLoader">
                        <div class="mb-4">
                            <label for="regNumber" class="block mb-1">Номер погрузчика</label>
                            <input type="text" id="regNumber" v-model="form.RegNumber" class="w-full border rounded-lg p-2">

                            <label for="marka" class="block mb-1">Марка погрузчика</label>
                            <input type="text" id="marka" v-model="form.Marka" class="w-full border rounded-lg p-2">

                            <label for="isActive" class="block mb-1">Активен?</label>
                            <select id="isActive" v-model="form.IsActive" class="w-full border rounded-lg p-2">
                                <option value="1">Да</option>
                                <option value="0">Нет</option>
                            </select>

                            <label for="user" class="block mb-1">Пользователь</label>
                            <select id="user" v-model="form.UserId" class="w-full border rounded-lg p-2">
                                <option v-for="user in users" :key="user.id" :value="user.id">{{ user.name }}</option>
                            </select>
                        </div>

                        <div class="flex justify-end">
                            <button type="button" @click="closeModal" class="mr-2 bg-gray-300 text-gray-700 px-4 py-2 rounded">Отмена</button>
                            <button  type="submit" class="bg-red-600 text-white px-4 py-2 rounded">Добавить</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="mb-4 flex flex-col space-y-4">
                <div>
                    <input v-model="form.model" type="text" placeholder="Номер погрузчика" class="mr-4 border rounded-lg p-2 w-1/2"/>
                    <button @click.prevent="search" class=" mr-4 bg-red-600 text-white px-4 py-2 rounded">Искать</button>
                    <button class=" mr-4 bg-red-600 text-white px-4 py-2 rounded">Изменить</button>
                </div>


                <div class="flex space-x-2">
                    <button @click="openModal" class="bg-red-600 text-white px-4 py-2 rounded">ДОБАВИТЬ</button>
                    <button class="bg-red-600 text-white px-4 py-2 rounded">ИЗМЕНИТЬ</button>
                    <button class="bg-red-600 text-white px-4 py-2 rounded">УДАЛИТЬ</button>
                    <button class="bg-red-600 text-white px-4 py-2 rounded">СОХРАНИТЬ</button>
                    <button class="bg-red-600 text-white px-4 py-2 rounded">ОТМЕНИТЬ</button>
                </div>
            </div>

            <div class="flex space-x-4">
                <div class="w-1/2 bg-white shadow-md rounded-lg p-4">
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
                        <tr v-for="loader in loaders" :key="loader.id">
                            <td class="border px-4 py-2">
                                <Link :href="route('loaders_breaking.show', loader.id)">{{ loader.id }}</Link>
                            </td>
                            <td class="border px-4 py-2">
                                <Link :href="route('loaders_breaking.show', loader.id)">{{ loader.Marka }}</Link>
                            </td>
                            <td class="border px-4 py-2">
                                <Link :href="route('loaders_breaking.show', loader.id)">{{ loader.RegNumber }}</Link>
                            </td>
                            <td class="border px-4 py-2">
                                <div class="flex items-center">
                                    <span class="ml-2">{{ loader.IsActive === 1 ? 'Активен' : 'Не активен' }}</span>
                                </div>
                            </td>
                            <td class="border px-4 py-2">{{ loader.Updated_When }}</td>
                            <td class="border px-4 py-2">{{ loader.user ? loader.user.name : 'Не найден' }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <div class="w-1/2 bg-white shadow-md rounded-lg p-4">
                    <h2 class="text-lg font-semibold mb-4">Простои по погрузчику</h2>

<!--                    <p v-for="loader in loaders" :key="loader.id">{{loader.RegNumber}}</p>-->

                    <p class="text-xs font-semibold mb-4 italic">Кликните по Марке/Номеру в таблице погрузчиков для отображения</p>
                    <table class="w-full border-collapse">
                        <thead class="bg-gray-200">
                        <tr>
                            <th class="border px-4 py-2">Дата начала</th>
                            <th class="border px-4 py-2">Дата окончания</th>
                            <th class="border px-4 py-2">Примечание</th>
                            <th class="border px-4 py-2">Время и дата изменения</th>
                            <th class="border px-4 py-2">Пользователь</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="breaking in loadingsBreaking" :key="breaking.id">
                            <td class="border px-4 py-2">{{ breaking.DateBegin }}</td>
                            <td class="border px-4 py-2">{{ breaking.DateEnd }}</td>
                            <td class="border px-4 py-2">{{ breaking.Note }}</td>
                            <td class="border px-4 py-2">{{ breaking.Updated_When }}</td>
                            <td class="border px-4 py-2">{{ breaking.Updated_By }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </Main>
</template>


<script setup>
import {Link} from "@inertiajs/vue3";
import Main from "@/Pages/Home/Main.vue";
import {onMounted, ref} from "vue";
import {useForm} from "@inertiajs/vue3";

const props = defineProps(['loaders', 'loadingsBreaking', 'users']);
const isModalOpen = ref(false);

onMounted(function () {
    console.log(props.loadingsBreaking)
})

const form = useForm({
    model: null,
    Marka: null,
    RegNumber: null,
    IsActive: null,
    UserId: null,
});

function search() {
    form.post("/loaders");
}

function addLoader() {
    form.post("/loaders.store");
    closeModal()
}

function openModal() {
    isModalOpen.value = true;
}

function closeModal() {
    isModalOpen.value = false;
}


</script>

<style scoped>

</style>
