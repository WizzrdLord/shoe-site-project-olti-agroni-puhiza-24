document.addEventListener('DOMContentLoaded', function () {
    //JS Discount RT Display
    const discountInput = document.getElementById('shoe_new_discount');
    const discountValue = document.getElementById('discount_value');
    
    discountInput.addEventListener('input', function () {
        discountValue.textContent = discountInput.value;
    });

    //JS Color Display Replacement
    const c_input = document.getElementById('shoe_new_color');
    const c_datalist = document.getElementById('Colors');
    const c_hiddenInput = document.getElementById('shoe_new_color_value');
    
    input.addEventListener('input', () => {
        const options = datalist.querySelectorAll('option');
        const inputValue = input.value;

        let matched = false;
        options.forEach(option => {
            if (option.innerText === inputValue) {
                hiddenInput.value = option.getAttribute('data-value');
                matched = true;
            }
        });

        if (!matched) {
            hiddenInput.value = '';
        }
    });
    //JS Material Display Replacement
    const m_input = document.getElementById('shoe_new_material');
    const m_datalist = document.getElementById('Materials');
    const m_hiddenInput = document.getElementById('shoe_new_material_value');

    input.addEventListener('input', () => {
        const options = datalist.querySelectorAll('option');
        const inputValue = input.value;

        let matched = false;
        options.forEach(option => {
            if (option.innerText === inputValue) {
                hiddenInput.value = option.getAttribute('data-value');
                matched = true;
            }
        });

        if (!matched) {
            hiddenInput.value = '';
        }
    });
    //JS Auto Date
    const today = new Date();
    const yyyy = today.getFullYear();
    const mm = String(today.getMonth() + 1).padStart(2, '0');
    const dd = String(today.getDate()).padStart(2, '0');
    const formattedDate = `${yyyy}-${mm}-${dd}`;

    // Set the value of the input to today's date
    const dateInput = document.getElementById('shoe_new_date');
    dateInput.value = formattedDate;
});