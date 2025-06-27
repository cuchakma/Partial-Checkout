import { defineConfig } from "vite";
import react from "@vitejs/plugin-react";
import path from "path";
export default defineConfig({
  plugins: [react()],
  build: {
    manifest: true,
    assetsDir: "",
    outDir: "./assets",
    emptyOutDir: true,
    sourcemap: true,
    rollupOptions: {
      input: { admin: "./react-src/index.jsx" },
      output: {
        manualChunks: (id) => { //extract the react js related dependencies on a seperate file
          if (id.includes("node_modules") ) {
            if (id.includes("react") || id.includes("react-dom") || id.includes('jsx-runtime')) {
              return "library/react-source-compiler.js";
            }
          }
        },
        entryFileNames: (chunkInfo) => {
          if (chunkInfo.name == "admin") {
            return `admin/${chunkInfo.name}.js`;
          }
        },
        assetFileNames: "[hash].[ext]",
      },
    },
    esbuild: {
      loader: {
        ".js": "jsx",
      },
    },
  },
});
