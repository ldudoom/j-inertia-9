<template>
    <app-layout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Módulo de Notas
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1">
                        <div class="p3-4 sm:px0">
                            <h3 class="text-lg text-gray-900">Listado de Notas</h3>
                            <p class="text-sm text-gray-600">Toma el registro correcto y ejecuta cualquier funcion (ver, editar o eliminar)</p>
                        </div>
                    </div>
                    <div class="md:col-span-2 mt-5 md:mt-0">
                        <div class="shadow bg-white md:rounded-md p-4">
                            <div class="flex justify-between">

                                <input type="text" class="form-input rounded-md shadow-sm" placeholder="Buscar..." v-model="strSearch" />

                                <Link
                                    :href="route('notes.create', {note: note})"
                                    class="bg-indigo-500 hover:bg-indigo-600 py-2 px-4 rounded-md text-white font-bold">
                                    Nueva Nota
                                </Link>
                            </div>
                            <hr class="mb-6 mt-6">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Nota</th>
                                        <th colspan="3"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="note in notes" :key="note.id">
                                        <td class="border px-4 py-2">
                                            {{ note.excerpt }}
                                        </td>
                                        <td class="px-4 py-2">
                                            <Link
                                                :href="route('notes.show', {note: note})">
                                                Ver
                                            </Link>
                                        </td>
                                        <td class="px-4 py-2">
                                            <Link
                                                :href="route('notes.edit', {note: note})">
                                                Editar
                                            </Link>
                                        </td>
                                        <td class="px-4 py-2">
                                            <a href="#" @click.prevent="destroy(note)">
                                                Eliminar
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </app-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import { Head, Link } from '@inertiajs/inertia-vue3'
    import AppLayout from '@/Layouts/AppLayout.vue'
import Input from '../../Jetstream/Input.vue';

    export default defineComponent({
        components: {
            AppLayout,
            Head,
            Link,
            Input
        },
        props: {
            notes: Array,
        },
        data () {
            return {
                strSearch: ''
            }
        },
        watch: {
            strSearch: function (value) {
                this.$inertia.get(this.route('notes.index',{strSearch: value}),{},{preserveState: true})
            }
        },
        methods: {
            destroy ($note) {
                if(confirm('¿Está seguro de que desea eliminar la nota: ' + $note.excerpt)){
                    this.$inertia.delete(this.route('notes.destroy', $note.id));
                }
            }
        }
    })
</script>
