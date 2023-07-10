
<button id="open-modal-button">Открыть модальное окно</button>

<div id="my-modal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <h2>Заголовок модального окна</h2>
    <p>Текст модального окна</p>
    <table>
      <thead>
        <tr>
          <th>Заголовок колонки 1</th>
          <th>Заголовок колонки 2</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Содержание ячейки 1</td>
          <td>Содержание ячейки 2</td>
        </tr>
        <tr>
          <td>Содержание ячейки 3</td>
          <td>Содержание ячейки 4</td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
<style>
.modal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100vw;
  height: 100vh;
  overflow: auto;
  background-color: rgba(0, 0, 0, 0.4);
}

/* Контент модального окна */
.modal-content {
  background-color: #fefefe;
  margin: 10% auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
  max-width: 600px;
}

/* Закрытие модального окна */
.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}
</style>
<script>
var modal = document.getElementById("my-modal");
var openButton = document.getElementById("open-modal-button");
var closeButton = document.getElementsByClassName("close")[0];

// Функция для открытия модального окна
function openModal() {
  modal.style.display = "block";
}

// Функция для закрытия модального окна
function closeModal() {
  modal.style.display = "none";
}

// Обработчики событий для открытия и закрытия модального окна
openButton.addEventListener("click", openModal);
closeButton.addEventListener("click", closeModal);

// Обработчик событий для закрытия модального окна при клике на стороне за его пределами
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

</script>
