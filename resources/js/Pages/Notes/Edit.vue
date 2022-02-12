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
                            <h3 class="text-lg text-gray-900">Editar una Nota</h3>
                            <p class="text-sm text-gray-600">
                                Formulario de edicion de la nota con ID "{{ note.id }}"
                            </p>
                        </div>
                    </div>
                    <div class="md:col-span-2 mt-5 md:mt-0">
                        <div class="shadow bg-white md:rounded-md p-4">
                            <form @submit.prevent="submit">
                                <label class="block font-medium font-bold text-sm text-gray-700">
                                    Resumen
                                </label>
                                <textarea class="form-input w-full rounded-md shadow-sm" v-model="form.excerpt"></textarea>

                                <label class="block font-medium font-bold text-sm text-gray-700">
                                    Contenido
                                </label>
                                <textarea class="form-input w-full rounded-md shadow-sm" v-model="form.content" rows="16"></textarea>
                                <button class="bg-indigo-500 hover:bg-indigo-600 text-white font-bold py-2 px-4 rounded-md">
                                    Guardar
                                </button>
                            </form>
                            <hr class="mb-6 mt-6">
                            <a href="#" @click.prevent="destroy" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-md">
                                Eliminar Nota
                            </a>
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

    export default defineComponent({
        components: {
            AppLayout,
            Head,
            Link
        },
        props: {
            note: Object,
        },
        data () {
            return {
                form: {
                    excerpt: this.note.excerpt,
                    content: this.note.content
                }
            }
        },
        methods: {
            submit () {
                /*
                  Utilizamos Inertia para enviar los datos del formulario, en este caso utilizamos
                  el verbo PUT, pero podriamos utilizar POST o PATCH, etc.
                  Dentro de put() colocamos la ruta a la que vamos a enviar los datos, en este caso
                  el metodo update de notes, enviando su ID.
                  Por ultimo, agregamos la informacion de la nota a actualizar, la cual se encuentra
                  en el objeto form declarado previamente.
                */
                this.$inertia.put(this.route('notes.update', this.note.id), this.form)
            },
            destroy () {
                if(confirm('¿Está seguro de que desea eliminar la nota: ' + this.note.excerpt)){
                    this.$inertia.delete(this.route('notes.destroy', this.note.id));
                }
            }
        }
    })
</script>
