/**
 * @param {HTMLTableElement}
 * @param {number}
  * @param {boolean}
  */

function sort(table, column,asc=false){
	const dirmodifier =  asc? 1: -1;
	const tBody = table.tBodies[0];
	const rows = Array.from(tBody.querySelectorAll("tr"));

	const sortedRows= rows.sort((a, b) => {

	});
}

sort(document.querySelector("table"), 1);