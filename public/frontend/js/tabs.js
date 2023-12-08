function openTab(evt, tabName) {
    // Получаем все элементы с классом "tab-content" и скрываем их
    var tabContents = document.getElementsByClassName("tab-content");
    for (var i = 0; i < tabContents.length; i++) {
      tabContents[i].style.display = "none";
    }

    // Удаляем класс "active" у всех элементов с классом "tab"
    var tabs = document.getElementsByClassName("tab");
    for (var i = 0; i < tabs.length; i++) {
      tabs[i].classList.remove("active");
    }

    // Отображаем выбранный таб и добавляем класс "active" к нему
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.classList.add("active");
}
