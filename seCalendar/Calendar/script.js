var navLeftButton = document.querySelector('.calendar-nav-left');
var navRightButton = document.querySelector('.calendar-nav-right');
var navMonth = document.querySelector('.calendar-nav-date');
const now =  moment();
//sets up initial page
navMonth.textContent = now.format('MMMM YYYY');
populateCalendar(now);

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
  populateCalendar(now);

  
})
navRightButton.addEventListener("click",(e) =>{
  //submit has a default action (refresh), preventDefault doesn't allow that behavior to occur
  e.preventDefault();
  addMonth(e);
  populateCalendar(now);
  
})
function populateCalendar(date) {
  
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
  //can't mutate date, so clone it.
  const firstDayOfMonth = date.clone().date(1);
  //format is not a mutating method
  console.log(firstDayOfMonth.format())
  // Once you have the first day of the month, you need to know the index.
  // The dictionary keys are day names. I get the day of the first month like 'Friday' to match
  // an index of 4.
  const firstDayIndex = dayIndices.get(firstDayOfMonth.format('dddd'));
  const dayOfFirstBox = firstDayOfMonth.clone().subtract(firstDayIndex, 'days');
  let iterator = dayOfFirstBox.clone()

  for (let i = 0; i < days.length; i++) {
    const dayDiv = days[i];
    dayDiv.textContent = iterator.date();
    iterator = iterator.add(1, 'days');
  }
  console.log(dayOfFirstBox.format('dddd, MM-DD-YYYY'));
}

