'use strict';
const Size = {

    /*-------------------------------------------------------------------------------
        # Initialize
    -------------------------------------------------------------------------------*/
    init: function () {
        document.querySelectorAll('.variation').forEach(function(button) {
            button.addEventListener('click', function() {
                // Ukloni prethodnu selekciju
                document.querySelectorAll('.variation').forEach(function(btn) {
                    btn.classList.remove('selected');
                });
                // Dodaj selekciju na kliknuto dugme
                button.classList.add('selected');
    
                // Ažuriraj hidden select element
                const attributeName = button.getAttribute('data-attribute_name');
                const attributeValue = button.getAttribute('data-value');
                const selectField = document.getElementById(attributeName);
                
                if (selectField) {
                    selectField.value = attributeValue;

                    // Pokreni 'change' događaj na select polju
                    selectField.dispatchEvent(new Event('change', { bubbles: true }));
                }
            });
        });
    }
};

export default Size;
