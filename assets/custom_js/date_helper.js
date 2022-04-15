var month_arr = [
	{month: 1, name: 'January'},
	{month: 2, name: 'February'},
	{month: 3, name: 'March'},
	{month: 4, name: 'April'},
	{month: 5, name: 'May'},
	{month: 6, name: 'June'},
	{month: 7, name: 'July'},
	{month: 8, name: 'August'},
	{month: 9, name: 'September'},
	{month: 10, name: 'Octpber'},
	{month: 11, name: 'November'},
	{month: 12, name: 'Desember'},
]

function getByNumber (numberOfMonth)
{
	for (let i = 0; i < month_arr.length; i++) {
		let element = month_arr[i];
		if (element.month == numberOfMonth) {
			return element
		}
	}
	return null;
}
