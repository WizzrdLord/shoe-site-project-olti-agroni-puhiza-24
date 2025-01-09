<form method="POST" action="">
    <p>Shoe Name</p>
    <input id="shoe_new_name" name="shoe_name" placeholder="Shoe Name" required>
    
    <p>Brand</p>
    <input id="shoe_new_brand" name="shoe_brand" placeholder="Shoe Brand" required>
    
    <p>Description</p>
    <textarea id="shoe_new_description" name="shoe_description" placeholder="Shoe Description" required></textarea>
    
    <p>Color</p>
    <input id="shoe_new_color" name="shoe_color" list="Colors" required>
    <datalist id="Colors">
        <option data-value="1">Red</option>
        <option data-value="2">Green</option>
        <option data-value="3">Blue</option>
        <option data-value="4">Yellow</option>
        <option data-value="5">Purple</option>
        <option data-value="6">Orange</option>
        <option data-value="7">Black</option>
        <option data-value="8">White</option>
        <option data-value="9">Gold</option>
        <option data-value="10">Silver</option>
        <option data-value="11">Gray</option>
        <option data-value="12">Beige</option>
        <option data-value="13">Brown</option>
    </datalist>
    <input type="hidden" id="shoe_new_color_value" name="shoe_color" required>

    <p>Material</p>
    <input id="shoe_new_material" name="shoe_material" list="Materials" required>
    <datalist id="Materials">
    <option data-value="1">Canvas</option>
    <option data-value="2">Cotton</option>
    <option data-value="3">Leather</option>
    <option data-value="4">Mesh</option>
    <option data-value="5">Nylon</option>
    <option data-value="6">Rubber</option>
    <option data-value="7">Sued</option>
    <option data-value="8">Synthetic</option>
    </datalist>
    <input type="hidden" id="shoe_new_material_value" name="shoe_material" required>


    <p>Price</p>
    <input id="shoe_new_price" name="shoe_price" placeholder="0$" required>

    <p>Gender</p>
    <input id="shoe_new_gender"
      name="shoe_gender"
      placeholder="🚁">

    <p>Discount</p>
    <label for="shoe_new_discount">Discount: <span id="discount_value">0</span>%</label>
    <input 
      type="range" 
      value="0" 
      step="5" 
      id="shoe_new_discount" 
      name="shoe_discount" 
      min="0" 
      max="100" 
      required>

<p>Added Date</p>
<input id="shoe_new_date" name="shoe_date_added "type="date" required>
<button type="submit" id="submit">Add Shoe</button>

<script>
    //JS Discount RT Display
    document.addEventListener('DOMContentLoaded', function () {
    const discountInput = document.getElementById('shoe_new_discount');
    const discountValue = document.getElementById('discount_value');

    discountInput.addEventListener('input', function () {
      discountValue.textContent = discountInput.value;
    });
    });
    //JS Color Display Replacement
    const input = document.getElementById('shoe_new_color');
    const datalist = document.getElementById('Colors');
    const hiddenInput = document.getElementById('shoe_new_color_value');
    
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
      const input = document.getElementById('shoe_new_material');
      const datalist = document.getElementById('Materials');
      const hiddenInput = document.getElementById('shoe_new_material_value');

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
    </script>
</form>