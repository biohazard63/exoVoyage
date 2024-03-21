window.onload = function() {
    console.log('Fetching categories and formulas...');
    fetch('../../php/controller/fetch_categories_and_formulas.php')
    .then(response => {
        console.log('Received response:', response);
        return response.json();
    })
    .then(data => {
        console.log('Received data:', data);
        const modalCategorySelect = document.getElementById('modal_category_id');
        const modalFormulaSelect = document.getElementById('modal_formula_id');

        console.log('Select elements:', modalCategorySelect, modalFormulaSelect);

        data.categories.forEach(category => {
            const option = document.createElement('option');
            option.value = category.id;
            option.text = category.name;
            modalCategorySelect.add(option);
        });

        data.formulas.forEach(formula => {
            const option = document.createElement('option');
            option.value = formula.id;
            option.text = formula.name;
            modalFormulaSelect.add(option);
        });
    })
    .catch(error => console.error('An error occurred:', error));
};