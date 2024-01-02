import React from 'react';

   const ModalWindow = ({ isOpen, onClose, children }) => {
     if (!isOpen) return null;

     return (
       {/* <div className="modal">
         <div className="modal-content">
           <span className="close" onClick={onClose}>&times;</span>
           {children}
         </div>
       </div> */}
     );
   };

   export default ModalWindow;
