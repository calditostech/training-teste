<template>
  <div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded-lg">
    <h1 class="text-3xl font-bold mb-4 text-gray-900">{{ training.title }}</h1>
    <p class="text-lg mb-4 text-gray-700">{{ training.description }}</p>
    <div class="space-y-2 mb-6">
      <p class="text-sm font-medium text-gray-600">Start Date:</p>
      <p class="text-lg text-gray-800">{{ formatDate(training.start_date) }}</p>
    </div>
    <div class="space-y-2 mb-6">
      <p class="text-sm font-medium text-gray-600">End Date:</p>
      <p class="text-lg text-gray-800">{{ formatDate(training.end_date) }}</p>
    </div>
    <Link
      href="/trainings"
      class="inline-block px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
    >
      Back
    </Link>
  </div>
</template>

<script>
export default {
  props: {
    training: Object
  },
  methods: {
    formatDate(dateString) {
      if (!dateString) return '';
      
      const [year, month, day] = dateString.split('-');
      return `${day}-${month}-${year}`;
    }
  }
}
</script>
