<template>
    <AuthenticatedLayout>
    <Head title="Animaux" />
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <section class="bg-gray-2 dark:bg-dark w-full pt-20 pb-12 lg:pb-[90px]">
                <div class="container mx-auto">
                    <div class="-mx-4 flex flex-wrap">

                        <!-- Colonne de filtre -->
                            <div class="w-full px-4 lg:w-4/12 pl-8">
                            <div class="mb-9 rounded-lg border border-stroke dark:border-dark-3 bg-white dark:bg-dark-2 pb-8 px-8 lg:px-6 xl:px-8">
                                <ul class="pt-6">
                                    <li class="border-b border-stroke dark:border-dark-3 pb-[18px] text-lg font-semibold text-dark dark:text-white">
                                        Filtre par espèce
                                    </li>
                                    <li class="mb-3" v-for="type in types" :key="type">
                                        <label class="flex items-center cursor-pointer select-none text-dark dark:text-white">
                                            <div class="relative">
                                                <input type="checkbox" class="sr-only" :value="type" v-model="selectedTypes" />
                                                <div class="box mr-4 flex h-5 w-5 items-center justify-center rounded border border-stroke dark:border-dark-3">
                                                <span v-if="selectedTypes.includes(type)" class="opacity-100">
                                                  <svg width="11" height="8" viewBox="0 0 11 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M10.0915 0.951972L10.0867 0.946075L10.0813 0.940568C9.90076 0.753564 9.61034 0.753146 9.42927 0.939309L4.16201 6.22962L1.58507 3.63469C1.40401 3.44841 1.11351 3.44879 0.932892 3.63584C0.755703 3.81933 0.755703 4.10875 0.932892 4.29224L0.932878 4.29225L0.934851 4.29424L3.58046 6.95832C3.73676 7.11955 3.94983 7.2 4.1473 7.2C4.36196 7.2 4.55963 7.11773 4.71406 6.9584L10.0468 1.60234C10.2436 1.4199 10.2421 1.1339 10.0915 0.951972ZM4.2327 6.30081L4.2317 6.2998C4.23206 6.30015 4.23237 6.30049 4.23269 6.30082L4.2327 6.30081Z" fill="#3056D3" stroke="#3056D3" stroke-width="0.4"></path>
                                                  </svg>
                                                </span>
                                                    <span v-else class="opacity-0">
                                                  <svg width="11" height="8" viewBox="0 0 11 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M10.0915 0.951972L10.0867 0.946075L10.0813 0.940568C9.90076 0.753564 9.61034 0.753146 9.42927 0.939309L4.16201 6.22962L1.58507 3.63469C1.40401 3.44841 1.11351 3.44879 0.932892 3.63584C0.755703 3.81933 0.755703 4.10875 0.932892 4.29224L0.932878 4.29225L0.934851 4.29424L3.58046 6.95832C3.73676 7.11955 3.94983 7.2 4.1473 7.2C4.36196 7.2 4.55963 7.11773 4.71406 6.9584L10.0468 1.60234C10.2436 1.4199 10.2421 1.1339 10.0915 0.951972ZM4.2327 6.30081L4.2317 6.2998C4.23206 6.30015 4.23237 6.30049 4.23269 6.30082L4.2327 6.30081Z" fill="#3056D3" stroke="#3056D3" stroke-width="0.4"></path>
                                                  </svg>
                                                </span>
                                                </div>
                                            </div>
                                            {{ type }}
                                        </label>
                                    </li>

                                    <li class="border-b border-stroke dark:border-dark-3 pb-[18px] text-lg font-semibold text-dark dark:text-white">
                                        Filtre par race
                                    </li>
                                    <li class="mb-3" v-for="race in races" :key="race">
                                        <label class="flex items-center cursor-pointer select-none text-dark dark:text-white">
                                            <div class="relative">
                                                <input type="checkbox" class="sr-only" :value="race" v-model="selectedRaces" />
                                                <div class="box mr-4 flex h-5 w-5 items-center justify-center rounded border border-stroke dark:border-dark-3">
                                                <span v-if="selectedRaces.includes(race)" class="opacity-100">
                                                  <svg width="11" height="8" viewBox="0 0 11 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M10.0915 0.951972L10.0867 0.946075L10.0813 0.940568C9.90076 0.753564 9.61034 0.753146 9.42927 0.939309L4.16201 6.22962L1.58507 3.63469C1.40401 3.44841 1.11351 3.44879 0.932892 3.63584C0.755703 3.81933 0.755703 4.10875 0.932892 4.29224L0.932878 4.29225L0.934851 4.29424L3.58046 6.95832C3.73676 7.11955 3.94983 7.2 4.1473 7.2C4.36196 7.2 4.55963 7.11773 4.71406 6.9584L10.0468 1.60234C10.2436 1.4199 10.2421 1.1339 10.0915 0.951972ZM4.2327 6.30081L4.2317 6.2998C4.23206 6.30015 4.23237 6.30049 4.23269 6.30082L4.2327 6.30081Z" fill="#3056D3" stroke="#3056D3" stroke-width="0.4"></path>
                                                  </svg>
                                                </span>
                                                    <span v-else class="opacity-0">
                                                  <svg width="11" height="8" viewBox="0 0 11 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M10.0915 0.951972L10.0867 0.946075L10.0813 0.940568C9.90076 0.753564 9.61034 0.753146 9.42927 0.939309L4.16201 6.22962L1.58507 3.63469C1.40401 3.44841 1.11351 3.44879 0.932892 3.63584C0.755703 3.81933 0.755703 4.10875 0.932892 4.29224L0.932878 4.29225L0.934851 4.29424L3.58046 6.95832C3.73676 7.11955 3.94983 7.2 4.1473 7.2C4.36196 7.2 4.55963 7.11773 4.71406 6.9584L10.0468 1.60234C10.2436 1.4199 10.2421 1.1339 10.0915 0.951972ZM4.2327 6.30081L4.2317 6.2998C4.23206 6.30015 4.23237 6.30049 4.23269 6.30082L4.2327 6.30081Z" fill="#3056D3" stroke="#3056D3" stroke-width="0.4"></path>
                                                  </svg>
                                                </span>
                                                </div>
                                            </div>
                                            {{ race }}
                                        </label>
                                    </li>

                                    <li class="border-b border-stroke dark:border-dark-3 pb-[18px] text-lg font-semibold text-dark dark:text-white">
                                        Filtre par statut
                                    </li>
                                    <li class="mb-3" v-for="statut in statuts" :key="statut">
                                        <label class="flex items-center cursor-pointer select-none text-dark dark:text-white">
                                            <div class="relative">
                                                <input type="checkbox" class="sr-only" :value="statut" v-model="selectedStatut" />
                                                <div class="box mr-4 flex h-5 w-5 items-center justify-center rounded border border-stroke dark:border-dark-3">
                                                <span v-if="selectedStatut.includes(statut)" class="opacity-100">
                                                  <svg width="11" height="8" viewBox="0 0 11 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M10.0915 0.951972L10.0867 0.946075L10.0813 0.940568C9.90076 0.753564 9.61034 0.753146 9.42927 0.939309L4.16201 6.22962L1.58507 3.63469C1.40401 3.44841 1.11351 3.44879 0.932892 3.63584C0.755703 3.81933 0.755703 4.10875 0.932892 4.29224L0.932878 4.29225L0.934851 4.29424L3.58046 6.95832C3.73676 7.11955 3.94983 7.2 4.1473 7.2C4.36196 7.2 4.55963 7.11773 4.71406 6.9584L10.0468 1.60234C10.2436 1.4199 10.2421 1.1339 10.0915 0.951972ZM4.2327 6.30081L4.2317 6.2998C4.23206 6.30015 4.23237 6.30049 4.23269 6.30082L4.2327 6.30081Z" fill="#3056D3" stroke="#3056D3" stroke-width="0.4"></path>
                                                  </svg>
                                                </span>
                                                    <span v-else class="opacity-0">
                                                  <svg width="11" height="8" viewBox="0 0 11 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M10.0915 0.951972L10.0867 0.946075L10.0813 0.940568C9.90076 0.753564 9.61034 0.753146 9.42927 0.939309L4.16201 6.22962L1.58507 3.63469C1.40401 3.44841 1.11351 3.44879 0.932892 3.63584C0.755703 3.81933 0.755703 4.10875 0.932892 4.29224L0.932878 4.29225L0.934851 4.29424L3.58046 6.95832C3.73676 7.11955 3.94983 7.2 4.1473 7.2C4.36196 7.2 4.55963 7.11773 4.71406 6.9584L10.0468 1.60234C10.2436 1.4199 10.2421 1.1339 10.0915 0.951972ZM4.2327 6.30081L4.2317 6.2998C4.23206 6.30015 4.23237 6.30049 4.23269 6.30082L4.2327 6.30081Z" fill="#3056D3" stroke="#3056D3" stroke-width="0.4"></path>
                                                  </svg>
                                                </span>
                                                </div>
                                            </div>
                                            {{ statut }}
                                        </label>
                                    </li>

                                    <li class="border-b border-stroke dark:border-dark-3 pb-[18px] text-lg font-semibold text-dark dark:text-white">
                                        Filtre par prix
                                    </li>
                                    <li class="mb-3">
                                        <label class="flex items-center cursor-pointer select-none text-dark dark:text-white">
                                            <div class="relative">
                                                <li class="mb-3">
                                                    <label for="price_min" class="block text-dark dark:text-white">Prix minimum</label>
                                                    <input type="number" id="price_min" name="price_min" v-model="price_min" class="border rounded py-2 px-3 text-dark dark:text-white dark:bg-dark-3" />
                                                </li>
                                                <li class="mb-3">
                                                    <label for="price_max" class="block text-dark dark:text-white">Prix maximum</label>
                                                    <input type="number" id="price_max" name="price_max" v-model="price_max" class="border rounded py-2 px-3 text-dark dark:text-white dark:bg-dark-3" />
                                                </li>
                                            </div>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Fin Filtre-->

                        <!-- Produits -->
                        <div class="w-full px-4 lg:w-8/12">
                            <div class="flex flex-wrap -mx-4 p-10">
                                <div v-if="pets.data.length > 0" v-for="pet in pets.data" :key="pet.id" class="w-full px-4 sm:w-full md:w-1/2 bg-gray-100">
                                    <div class="overflow-hidden h-[600px] duration-300 rounded-lg border-2 hover:shadow-3">
                                        <div class="relative">
                                            <div class="carousel h-48">
                                                <div
                                                    v-for="(photo, index) in pet.photos"
                                                    :key="index"
                                                    class="carousel-item w-full h-full object-cover rounded-t-lg"
                                                    v-show="index === pet.currentSlide">
                                                    <img :src="'storage/' + photo" alt="Product Image" class="w-full h-full object-cover rounded-t-lg">
                                                </div>
                                            </div>
                                            <div v-if="pet.photos.length > 1" class="absolute inset-0 flex items-center justify-between px-4" style="top: 80%;">
                                                <button @click="prevSlide(pet.id)" class="bg-gray-500 text-white px-2 py-1">Précédent</button>
                                                <button @click="nextSlide(pet.id)" class="bg-gray-500 text-white px-2 py-1">Suivant</button>
                                            </div>
                                        </div>
                                        <div class="p-8 text-center sm:p-9 md:p-7 xl:p-9">
                                            <h3 class="text-lg font-semibold text-dark dark:text-white mb-2">{{ pet.name }} - Age {{ pet.age }} ans</h3>
                                            <h3 class="text-lg font-semibold text-dark dark:text-white mb-2">{{ pet.type }} {{ pet.race ? ' - ' + pet.race : ''}}</h3>
                                            <div class="tooltip bg-primary inline-flex mb-7 rounded py-2 px-[18px] text-base leading-relaxed text-body-color font-medium">
                                                {{ truncat(pet.description, 200) }}
                                            </div>

                                            <p class="text-base leading-relaxed text-body-color dark:text-dark-6 mb-7">
                                                Prix {{ pet.price_ttc }} € TTC - <span class="uppercase">{{ pet.statut }}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div v-else class="w-full px-4">
                                    <div class="bg-white dark:bg-dark-2 rounded-lg border border-stroke dark:border-dark-3 p-8 text-center">
                                        <p class="text-lg font-semibold text-dark dark:text-white">Aucun animal trouvé</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Fin Produits-->

                    </div>
                </div>

                <!-- Pagination -->
                <div class="flex flex-col items-center mt-10">
                    <!-- Help text -->
                    <span v-if="total" class="text-sm text-gray-700 dark:text-gray-400">
                     <span class="font-semibold text-gray-900 dark:text-white">{{ total }}</span> Résultats
                    </span>
                    <div class="inline-flex mt-2 xs:mt-0">
                        <!-- a -->
                        <a v-if="prev_page_url" :href="prev_page_url" class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-gray-800 rounded-l hover:bg-gray-900 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <svg class="w-3.5 h-3.5 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
                            </svg>
                            Précédant
                        </a>
                        <a v-if="next_page_url" :href="next_page_url" class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-gray-800 border-0 border-l border-gray-700 rounded-r hover:bg-gray-900 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            Suivant
                            <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <!-- Fin Pagination -->

            </section>
        </div>
    </div>
    </AuthenticatedLayout>
</template>


<script>
import { Head, Link } from '@inertiajs/vue3';
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

export default {
    components: {
        AuthenticatedLayout,
        Head,
        Link,
    },
    props: {
        propsPets: Object,
        types: Array,
        races: Array,
        statuts: Array,
    },
    data() {
        return {
            pets: this.propsPets,
            selectedTypes: [],
            selectedRaces: [],
            selectedStatut: [],
            price_min: null,
            price_max: null,
            prev_page_url: this.propsPets.prev_page_url,
            next_page_url: this.propsPets.next_page_url,
            total: this.propsPets.total,
        };
    },
    watch: {
        selectedTypes() {
            this.search();
        },
        selectedRaces() {
            this.search();
        },
        selectedStatut() {
            this.search();
        },
        price_min() {
            this.search();
        },
        price_max() {
            this.search();
        },
    },
    methods: {
        search() {
            axios.post('pets/search', {
                types: this.selectedTypes,
                races: this.selectedRaces,
                statuts: this.selectedStatut,
                price_min: this.price_min,
                price_max: this.price_max,
            }).then(response => {
                this.pets = response.data
                this.prev_page_url = response.data.prev_page_url
                this.next_page_url = response.data.next_page_url
                this.total = response.data.total
            });
        },
        truncat(text, length) {
            return text.length > length ? text.substring(0, length) + '...' : text;
        },
        prevSlide(petId) {
            const pet = this.pets.data.find(p => p.id === petId);
            pet.currentSlide = (pet.currentSlide > 0) ? pet.currentSlide - 1 : pet.photos.length - 1;
        },
        nextSlide(petId) {
            const pet = this.pets.data.find(p => p.id === petId);
            pet.currentSlide = (pet.currentSlide < pet.photos.length - 1) ? pet.currentSlide + 1 : 0;
        }
    }
};

</script>

<style scoped>
.carousel {
    position: relative;
}
.carousel-item {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    transition: opacity 0.5s ease;
}
.border {
    border-width: 3px;
}
</style>
