 // Получаем элементы, связанные с модальным окном
/*  var modalBtns = document.querySelectorAll('.modal-btn');
   modalBtns.forEach(function(btn) {
      btn.addEventListener('click', function() {
         var target = btn.getAttribute('data-target');
         var modal = document.querySelector(target);
         modal.style.display = 'block';
      });
   });

var closeBtns = document.querySelectorAll('.close');
   closeBtns.forEach(function(btn) {
      btn.addEventListener('click', function() {
         var modal = btn.closest('.modal');
         modal.style.display = 'none';
      });
   }); */



   var modalBtns = document.querySelectorAll('.modal-btn');
   modalBtns.forEach(function(btn) {
      btn.addEventListener('click', function() {
         var target = btn.getAttribute('data-target');
         var modal = document.querySelector(target);
         modal.style.display = 'block';
      });
   });

   var closeBtns = document.querySelectorAll('.close, .modal');
   closeBtns.forEach(function(btn) {
      btn.addEventListener('click', function() {
         var modal = btn.closest('.modal');
         modal.style.display = 'none';
      });
   });
