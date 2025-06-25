===========================================
Partial Checkout Plugin
===========================================

A plugin that enables **partial checkout functionality** — allowing customers to check out only selected items from their cart. Ideal for WooCommerce stores seeking more flexible checkout experiences.

-------------------------------------------
📦 Installation Instructions
-------------------------------------------

To install and set up the plugin locally, follow these steps:

1. Clone the repository:
   git clone https://github.com/cuchakma/Partial-Checkout.git

2. Navigate into the plugin directory:
   cd Partial-Checkout

3. Install PHP dependencies:
   composer install

4. Install JavaScript (React) dependencies:
   pnpm install   OR   npm install

-------------------------------------------
🧪 Development: React Admin Panel
-------------------------------------------

To start the development server for the React-based admin interface:

1. From the root of the plugin directory, run:
   pnpm run start

This will launch the development server with hot reloading for files inside `/react-src/`.

> 📝 Note: The final React build should output to `/assets/` (if set in your build config).

-------------------------------------------
📁 Folder Structure
-------------------------------------------

/Partial-Checkout/
│
├── /assets/             # Static files (images, icons, dev builds, etc.)
├── /includes/           # Core PHP logic, classes, and functionality
├── /react-src/          # Source code for the React admin panel
├── /languages/          # Localization and translation files
├── partial-checkout.php # Main plugin bootstrap file
├── composer.json        # PHP dependency manager configuration
├── package.json         # Node.js project configuration
└── README.txt           # You're reading this file

-------------------------------------------
🔧 Requirements
-------------------------------------------

- PHP >= 7.4
- Composer
- Node.js >= 14
- pnpm (preferred) or npm
- WordPress >= 5.8
- (Optional) WooCommerce >= 5.0

-------------------------------------------
🧑‍💻 Contributing
-------------------------------------------

We welcome contributions! To get involved:

1. Fork the repository
2. Create a feature or fix branch
3. Submit a pull request with a clear description of your changes

-------------------------------------------
📃 License
-------------------------------------------

This plugin is licensed under the MIT License. See `LICENSE` for full details.

-------------------------------------------
🔗 Repository
-------------------------------------------

GitHub: https://github.com/cuchakma/Partial-Checkout

-------------------------------------------
✉️ Support & Feedback
-------------------------------------------

For bug reports, suggestions, or questions, please open an issue on GitHub.

-------------------------------------------
