/* ---------------------------------------------------- APP ---------------------------------- */
$("li").click("click", function(){
    $(this).toggleClass("done"); 
});


$("#add-item-text").keyup("keyup", function(e){ 					// Event detecteren: bij het indrukken ve toets
	if(e.which === 13) // als de ingedrukte toets de "enter"-toets is, dan... 
	{
        
		var todoText = $(this).val();                   //Tekst van textbox klaarmaken voor in listitem te steken
		var li = document.createElement("li");			// nieuw listitem maken
		li.innerHTML = todoText;						// Doorgegeven tekst in het nieuwe listitem zetten
		li.className = "prior-high";					// Nieuwe item class "rood" geven (dringend)

		$(this).innerHTML = $(this).val(""); 			// Tekstbox leegmaken (werkt niet)

		$("#todo-list").prepend(li); 					// Nieuwe listitem toevoegen aan todo-lijst
		$(li).click("click", function(){			    // Bij aanklikken nieuwe listitems:
			$(this).toggleClass("done"); 			    // Class togglen
		});
	}
});