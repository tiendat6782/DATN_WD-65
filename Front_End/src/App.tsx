import HomePage from "./components/HomePage";
import DetailPage from "./Components/DetailPage";
import Websitelayout from "./pages/Websitelayout";
import './App.css'
import { BrowserRouter, Route, Routes } from 'react-router-dom'
function App() {
///////
  return (
    <>
      <BrowserRouter>
        <Routes>
          <Route path='/products' element={<DetailPage />} />
          <Route path='/' element={<Websitelayout />}>
            <Route index element={<HomePage />} />
          </Route>
        </Routes>
      </BrowserRouter>
    </>
  )
}

export default App
