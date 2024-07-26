<template>
  <div class="p-6 max-w-4xl mx-auto">
    <h1 class="text-3xl font-bold mb-6">Trainings</h1>

    <div class="mb-4">
      <Link href="/trainings/create" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
        Add New Training
      </Link>
    </div>

    <ul class="space-y-4">
      <li v-for="training in trainings" :key="training.id" class="bg-white shadow-md rounded-lg p-4 flex justify-between items-center">
        <div>
          <Link :href="`/trainings/${training.id}`" class="text-blue-500 hover:underline">
            {{ training.title }}
          </Link>
        </div>
        <div class="flex space-x-4">
          <Link :href="`/trainings/${training.id}/edit`" class="text-yellow-500 hover:underline">
            Edit
          </Link>
          <button @click="confirmDelete(training.id)" class="text-red-500 hover:underline">
            Delete
          </button>
        </div>
      </li>
    </ul>

    <!-- Modal -->
    <div v-if="showModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
      <div class="bg-white p-6 rounded-lg shadow-lg max-w-sm mx-auto">
        <h2 class="text-lg font-bold mb-4">Confirmação de Exclusão</h2>
        <p class="mb-4">Tem certeza de que deseja excluir este treinamento?</p>
        <div class="flex justify-end space-x-4">
          <button @click="deleteTraining" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
            Excluir
          </button>
          <button @click="showModal = false" class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">
            Cancelar
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { Inertia } from '@inertiajs/inertia';
import { Link } from '@inertiajs/inertia-vue3';

export default {
  props: {
    trainings: Array
  },
  data() {
    return {
      showModal: false,
      trainingToDelete: null
    };
  },
  methods: {
    confirmDelete(id) {
      this.trainingToDelete = id;
      this.showModal = true;
    },
    deleteTraining() {
      if (this.trainingToDelete) {
        Inertia.delete(`/trainings/${this.trainingToDelete}`);
        this.showModal = false;
        this.trainingToDelete = null;
      }
    }
  }
}
</script>

<style scoped>
/* Add any additional styles here if needed */
</style>
