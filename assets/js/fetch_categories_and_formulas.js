window.onload = function() {
    // Fetch categories and formulas from the server
    fetch('../controller/fetch_categories_and_formulas.php') // Update the path here
        .then(response => {
            return response.json();
        })
        .then(data => {

            // Select the category and formula select elements
            const categorySelect = document.getElementById('category_id');
            const formulaSelect = document.getElementById('formula_id');

            // Add categories to the category select element
            data.categories.forEach(category => {
                const option = document.createElement('option');
                option.value = category.id;
                option.text = category.name;
                categorySelect.add(option);
            });

            // Add formulas to the formula select element
            data.formulas.forEach(formula => {
                const option = document.createElement('option');
                option.value = formula.id;
                option.text = formula.name;
                formulaSelect.add(option);
            });
        })
        .catch(error => {
        });
}