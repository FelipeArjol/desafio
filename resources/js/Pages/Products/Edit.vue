<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Inertia } from "@inertiajs/inertia";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

const form = useForm({
    name: props.product.name,
    code: props.product.code,
    price: props.product.price,
    image: null,
});

const props = defineProps({
    product: Object,
    image: String,
});

function updateProduct() {
    Inertia.post(`/products/${props.product.id}`, {
        _method: "put",
        name: form.name,
        code: form.code,
        price: form.price,
        image: form.image,
    });
}
</script>

<template>
    <Head title="Products" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Editar Produto
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
                            @submit.prevent="updateProduct"
                            class="bg-white shadow-md m-2 p-2 rounded"
                        >
                            <div class="sm:col-span-6">
                                <label
                                    for="title"
                                    class="block text-sm font-medium text-gray-700"
                                >
                                    Nome
                                </label>
                                <div class="mt-1">
                                    <input
                                        type="text"
                                        v-model="form.name"
                                        id="title"
                                        wire:model.lazy="title"
                                        name="title"
                                        class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                    />
                                </div>
                            </div>
                            <div class="sm:col-span-6">
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
                                        id="title"
                                        wire:model.lazy="title"
                                        name="title"
                                        class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                    />
                                </div>
                            </div>
                            <div class="sm:col-span-6">
                                <label
                                    for="title"
                                    class="block text-sm font-medium text-gray-700"
                                >
                                    Preço
                                </label>
                                <div class="mt-1">
                                    <input
                                        type="text"
                                        v-model="form.price"
                                        id="title"
                                        wire:model.lazy="title"
                                        name="title"
                                        class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                                    />
                                </div>
                            </div>
                            <div class="sm:col-span-6">
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
                                <div class="m-2 p-2">
                                    <img :src="image" class="w-32 h-32" />
                                </div>
                            </div>
                            <div class="flex justify-end m-2 p-2">
                                <button
                                    type="submit"
                                    class="px-4 py-2 bg-indigo-500 hover:bg-indigo-600 text-white rounded"
                                >
                                    Atualizar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
