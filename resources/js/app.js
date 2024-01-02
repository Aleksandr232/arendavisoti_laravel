require('./bootstrap');

import React from 'react';
   import ReactDOM from 'react-dom';
   import ModalWindow from './components/ModalWindow';

   const App = () => {
     const [isModalOpen, setModalOpen] = React.useState(false);

     return (
       {/* <div>
         <button onClick={() => setModalOpen(true)}>Открыть модальное окно</button>
         <ModalWindow isOpen={isModalOpen} onClose={() => setModalOpen(false)}>
           <p>Это содержимое модального окна</p>
         </ModalWindow>
       </div> */}
     );
   };

   if (document.getElementById('app')) {
     ReactDOM.render(<App />, document.getElementById('app'));
   }
