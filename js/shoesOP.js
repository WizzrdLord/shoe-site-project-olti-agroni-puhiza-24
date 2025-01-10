document.addEventListener('DOMContentLoaded', function () {
  // JS Discount RT Display
  const discountInput = document.getElementById('discount');
  const discountValue = document.getElementById('discount_value');
  discountInput.addEventListener('input', function () {
      discountValue.textContent = discountInput.value;
  });
  // JS Color Display Replacement
  const c_input = document.getElementById('color');
  const c_datalist = document.getElementById('Colors');
  const c_hiddenInput = document.getElementById('color_value');
  c_input.addEventListener('input', function () {
      const options = c_datalist.querySelectorAll('option');
      const inputValue = c_input.value;
      let matched = false;
      options.forEach(option => {
          if (option.value === inputValue) {
              c_hiddenInput.value = option.getAttribute('data-value');
              matched = true;
          }
      });
      if (!matched) {
          c_hiddenInput.value = '';
      }
  });
  // JS Material Display Replacement
  const m_input = document.getElementById('material');
  const m_datalist = document.getElementById('Materials');
  const m_hiddenInput = document.getElementById('material_value');
  m_input.addEventListener('input', function () {
      const options = m_datalist.querySelectorAll('option');
      const inputValue = m_input.value;
      let matched = false;
      options.forEach(option => {
          if (option.value === inputValue) {
              m_hiddenInput.value = option.getAttribute('data-value');
              matched = true;
          }
      });
      if (!matched) {
          m_hiddenInput.value = '';
      }
  });
  // JS Auto Date
  const today = new Date();
  const yyyy = today.getFullYear();
  const mm = String(today.getMonth() + 1).padStart(2, '0');
  const dd = String(today.getDate()).padStart(2, '0');
  const formattedDate = `${yyyy}-${mm}-${dd}`;
  // Set the value of the input to today's date
  const dateInput = document.getElementById('date_added');
  dateInput.value = formattedDate;
});