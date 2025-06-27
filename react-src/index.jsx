import { createRoot } from "react-dom/client";
import Text from "./components/Test";

const domNode = document.getElementById("partial-checkout");
const root = createRoot(domNode);

root.render(<Text />);