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
        entryFileNames: (chunkInfo) => {
          if (chunkInfo.name == "admin") {
            return "admin/[hash].js";
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
