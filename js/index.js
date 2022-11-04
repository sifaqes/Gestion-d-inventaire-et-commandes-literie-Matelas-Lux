var doc = new jsPDF();

const nom = document.getElementById('name').innerText;

doc.text('Matelaslux - Facture', 30, 30);
doc.text('Name: ' + nom, 30, 40);
doc.save('Facture.pdf');