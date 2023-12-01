import { Route, createBrowserRouter, createRoutesFromElements, RouterProvider } from "react-router-dom";
import AddSupplier from "./Components/addSupplier.js";
import ViewSupplier from "./Components/viewSupplier.js";

const router = createBrowserRouter(
  createRoutesFromElements(
    <Route>
      <Route path="/" element={<ViewSupplier />} />
      <Route path="/addSupplier" element={<AddSupplier />} />
    </Route>
  )
)

function App() {
  return (
    <div className="App">
      <RouterProvider router={router} />
    </div>
  );
}

export default App;
