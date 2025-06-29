import { defineConfig } from "vite";
import react from "@vitejs/plugin-react";
import path from "path";
export default defineConfig({
  plugins: [react()],
  assetsInclude: ['**/*.png', '**/*.jpg', '**/*.jpeg', '**/*.gif', '**/*.svg'],
  resolve: {
    alias: {
      "@": path.resolve(__dirname, "./react-src"),
    },
  },
  build: {
    manifest: true,
    assetsDir: "",
    outDir: "./assets",
    emptyOutDir: true,
    sourcemap: true,
    rollupOptions: {
      input: { "partial-admin": "./react-src/index.jsx" },
      output: {
        assetFileNames: ({ names }) => {
          return `images/${names}`;
        },
        manualChunks: (id) => {
          //extract the react js related dependencies on a seperate file
          if (id.includes("node_modules")) {
            if (
              id.includes("react") ||
              id.includes("react-dom") ||
              id.includes("jsx-runtime")
            ) {
              return "library/react-source-compiler.js";
            }
          }
        },
        entryFileNames: (chunkInfo) => {
          if (chunkInfo.name == "partial-admin") {
            return `admin/${chunkInfo.name}.js`;
          }
        },
      },
    },
    esbuild: {
      loader: {
        ".js": "jsx",
      },
    },
  },
});
