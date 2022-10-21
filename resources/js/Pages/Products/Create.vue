<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

const form = useForm({
    name: null,
    code: null,
    price: null,
    image: null,
});

function storeProduct() {
    form.post("/products");
}
</script>

<template>
    <Head title="Products" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Adicionar Produto
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-end m-2 p-2">
                    <Link
                        href="/products"
                        class="px-4 py-2 bg-indigo-500 hover:bg-indigo-600 text-white rounded"
                        >Voltar</Link
                    >
                </div>
                <div
                    class="w-lg-600px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto"
                >
                    <div class="">
                        <form
                            @submit.prevent="storeProduct"
                            class="bg-white shadow-md m-2 p-2 rounded"
                        >
                            <div class="sm:col-span-6 mt-2">
                                <label
                                    for="title"
                                    class="block text-sm font-medium text-gray-700"
                                    required="true"
                                >
                                    Nome
                                </label>
                                <div class="mt-1">
                                    <input
                                        type="text"
                                        required="true"
                                        v-model="form.name"
                                        id="title"
                                        wire:model.lazy="title"
                                        name="title"
                                        class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                    />
                                </div>
                            </div>
                            <div class="sm:col-span-6 mt-2">
                                <label
                                    for="title"
                                    class="block text-sm font-medium text-gray-700"
                                >
                                    Código
                                </label>
                                <div class="mt-1">
                                    <input
                                        type="text"
                                        v-model="form.code"
                                        name="title"
                                        class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                    />
                                </div>
                            </div>
                            <div class="sm:col-span-6 mt-2">
                                <label
                                    for="title"
                                    class="block text-sm font-medium text-gray-700"
                                >
                                    Preço
                                </label>
                                <div class="mt-1">
                                    <input
                                        type="number"
                                        v-model="form.price"
                                        id="title"
                                        name="title"
                                        class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                    />
                                </div>
                            </div>
                            <div class="sm:col-span-6 mt-2">
                                <label
                                    for="title"
                                    class="block text-sm font-medium text-gray-700"
                                >
                                    Imagem
                                </label>
                                <div class="mt-1">
                                    <input
                                        type="file"
                                        id="image"
                                        wire:model="newImage"
                                        name="image"
                                        @input="
                                            form.image = $event.target.files[0]
                                        "
                                        class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                    />
                                </div>
                            </div>
                            <div class="flex justify-end m-2 p-2">
                                <button
                                    type="submit"
                                    class="px-4 py-2 bg-indigo-500 hover:bg-indigo-600 text-white rounded"
                                >
                                    Cadastrar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
