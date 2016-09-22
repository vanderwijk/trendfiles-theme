//<![CDATA[

// wait until all the resources are loaded
window.addEventListener("load", findSVGElements, false);

// fetches the document for the given embedding_element
function getSubDocument(embedding_element) {
	if (embedding_element.contentDocument) {
		return embedding_element.contentDocument;
	}
	else {
		var subdoc = null;
		try {
			subdoc = embedding_element.getSVGDocument();
		} catch(e) {}
		return subdoc;
	}
}

function showInformation() {
	jQuery( "." + (this.id) ).prop('checked', !(jQuery( "." + (this.id) ).is(':checked')));
	jQuery( 'input[value=selecteer-regio]' ).attr( 'checked', true );
	return false;
}

function findSVGElements() {
	var elms = document.querySelectorAll(".map");
	for (var i = 0; i < elms.length; i++) {
		var subdoc = getSubDocument(elms[i])
		if (subdoc) {
			subdoc.getElementById("gelderland-overijssel").onclick = showInformation;
			subdoc.getElementById("midden-nederland").onclick = showInformation;
			subdoc.getElementById("zuid-nederland").onclick = showInformation;
			subdoc.getElementById("zuid-holland").onclick = showInformation;
			subdoc.getElementById("noord-holland").onclick = showInformation;
			subdoc.getElementById("noord-nederland").onclick = showInformation;
		}
	}
}
//]]>