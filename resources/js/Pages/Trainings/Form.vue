<template>
  <div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">
      {{ isEdit ? 'Edit Training' : 'Create Training' }}
    </h1>
    <form @submit.prevent="submit" class="space-y-4">
      <div>
        <label for="title" class="block text-sm font-medium text-gray-700">Title:</label>
        <input
          type="text"
          v-model="form.title"
          id="title"
          required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
        />
      </div>
      <div>
        <label for="description" class="block text-sm font-medium text-gray-700">Description:</label>
        <textarea
          v-model="form.description"
          id="description"
          required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
          rows="4"
        ></textarea>
      </div>
      <div>
        <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date:</label>
        <input
          type="date"
          v-model="form.start_date"
          id="start_date"
          required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
        />
      </div>
      <div>
        <label for="end_date" class="block text-sm font-medium text-gray-700">End Date:</label>
        <input
          type="date"
          v-model="form.end_date"
          id="end_date"
          required
          class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
        />
      </div>
      <div class="flex justify-end">
        <button
          type="submit"
          class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
        >
          {{ isEdit ? 'Update' : 'Create' }}
        </button>
      </div>
    </form>
  </div>
</template>

<script>
import { Inertia } from '@inertiajs/inertia';

export default {
  props: {
    training: Object,
    isEdit: Boolean,
  },
  data() {
    return {
      form: this.isEdit ? { ...this.training } : {
        title: '',
        description: '',
        start_date: '',
        end_date: '',
      },
    };
  },
  methods: {
    submit() {
      if (this.isEdit) {
        Inertia.put(`/trainings/${this.training.id}`, this.form);
      } else {
        Inertia.post('/trainings', this.form);
      }
    }
  }
}
</script>

<style scoped>
/* Add any additional styles here if needed */
</style>
