<form method="POST" action="">
    <input 
      id="name" 
      name="shoe_name" 
      placeholder="Shoe Name" 
      required>

    <input 
      id="brand" 
      name="shoe_brand" 
      placeholder="Shoe Brand" 
      required>
    
    <textarea 
      id="description" 
      name="shoe_description" 
      placeholder="Shoe Description" 
      required>
    </textarea>
    
    <input 
      id="color" 
      name="shoe_color" 
      list="Colors" 
      placeholder="Color" 
      required>
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
    <input 
      type="hidden" 
      id="color_value"
      name="shoe_color" 
      required>

    <input 
      id="material" 
      name="shoe_material" 
      list="Materials" 
      placeholder="Material" 
      required>
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
    <input 
      type="hidden" 
      id="material_value" 
      name="shoe_material" 
      required>

    <input 
      id="price" 
      name="shoe_price" 
      placeholder="0$" 
      required>

    <p>Gender</p>
    <input 
      id="gender"
      name="shoe_gender"
      placeholder="🚁">

    <label for="discount">Discount: <span id="discount_value">50</span>%</label>
    <input 
      type="range" 
      value="0" 
      step="5" 
      id="discount"
      name="shoe_discount" 
      min="0" 
      max="100" 
      required>

    <p>Date</p>
    <input 
      id="date_added" 
      name="shoe_date_added"
      type="date" 
      required>

    <script src="js/shoesOP.js"></script>
    <button type="submit" id="submit">Add Shoe</button>
</form>