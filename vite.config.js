import { defineConfig } from 'vite';

export default defineConfig({
  build: {
    // Output directory
    outDir: 'dist',
    // Generate manifest.json for backend to parse if needed
    manifest: true,
    rollupOptions: {
      // Define our entry points here
      input: {
        'index-js': 'assets/js/index/main.js',
        'index-css': 'assets/css/main.css'
      }
    }
  },
  // Ensure we don't clear the dist directory if there's other stuff in it
  emptyOutDir: true
});
