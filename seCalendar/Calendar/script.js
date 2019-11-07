var navLeftButton = document.querySelector('.calendar-nav-left');
var navRightButton = document.querySelector('.calendar-nav-right');
var navMonth = document.querySelector('.calendar-nav-date');
const now =  moment();
//sets up initial page
navMonth.textContent = now.format('MMMM YYYY');

function addMonth(e) {
  now.add(1, 'month');
  //itll reset new month, formatted
  navMonth.textContent = now.format('MMMM YYYY');

  
}
function subtractMonth(e) {
  now.subtract(1, 'month');
  navMonth.textContent = now.format('MMMM YYYY');
}
//2 event listeners
navLeftButton.addEventListener("click",(e) =>{
  //submit has a default action (refresh), preventDefault doesn't allow that behavior to occur
  e.preventDefault();
  subtractMonth(e);
  
})
navRightButton.addEventListener("click",(e) =>{
  //submit has a default action (refresh), preventDefault doesn't allow that behavior to occur
  e.preventDefault();
  addMonth(e);
  
})
function populateCalendar() {
  const now = moment();
  const days = Array.from(document.querySelectorAll('.day'));
  const dayIndices = new Map([
    ['Monday', 0],
    ['Tuesday', 1],
    ['Wednesday', 2],
    ['Thursday', 3],
    ['Friday', 4],
    ['Saturday', 5],
    ['Sunday', 6]
  ]);
  const firstDayOfMonth = moment().date(1);
  console.log(firstDayOfMonth.format())
  // Once you have the first day of the month, you need to know the index.
  // The dictionary keys are day names. I get the day of the first month like 'Friday' to match
  // an index of 4.
  const firstDayIndex = dayIndices.get(firstDayOfMonth.format('dddd'));
  const firstDayOfCalendar = moment(firstDayOfMonth).subtract(firstDayIndex, 'days');
  let iterator = moment(firstDayOfCalendar);

  for (let i = 0; i < days.length; i++) {
    const dayDiv = days[i];
    dayDiv.textContent = iterator.date();
    iterator = iterator.add(1, 'days');
  }
  console.log(firstDayOfCalendar.format('dddd, MM-DD-YYYY'));
}