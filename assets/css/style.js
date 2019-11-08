import { StyleSheet } from 'react-native';

export default StyleSheet.create({
  // ** COMMON ***
  body: {
    fontFamily: ''Montserrat', sans-serif',
    minHeight: [{ unit: '%V', value: 1 }],
    margin: [{ unit: 'px', value: 0 }, { unit: 'px', value: 0 }, { unit: 'px', value: 0 }, { unit: 'px', value: 0 }],
    padding: [{ unit: 'px', value: 0 }, { unit: 'px', value: 0 }, { unit: 'px', value: 0 }, { unit: 'px', value: 0 }],
    position: 'relative'
  },
  html: {
    height: [{ unit: '%V', value: 1 }]
  },
  errorMessage: {
    color: '#e53935',
    fontStyle: 'italic',
    fontWeight: 'bold'
  },
  footer: {
    position: 'absolute',
    bottom: [{ unit: 'px', value: 0 }],
    left: [{ unit: 'px', value: 0 }],
    right: [{ unit: 'px', value: 0 }]
  },
  '#toast-container': {
    position: 'absolute',
    width: [{ unit: '%H', value: 1 }],
    top: [{ unit: 'px', value: 0 }],
    left: [{ unit: 'px', value: 0 }],
    maxWidth: [{ unit: '%H', value: 1 }]
  },
  toast: {
    justifyContent: 'normal',
    display: 'inline-block',
    width: [{ unit: '%H', value: 1 }],
    maxWidth: [{ unit: '%H', value: 1 }]
  },
  flashMessageBar: {
    backgroundColor: '#42a5f5!important'
  },
  '#mainContent': {
    margin: [{ unit: 'px', value: 0 }, { unit: 'string', value: 'auto' }, { unit: 'px', value: 0 }, { unit: 'string', value: 'auto' }],
    width: [{ unit: '%H', value: 0.9 }],
    marginBottom: [{ unit: 'px', value: 160 }]
  },
  h1: {
    fontSize: [{ unit: 'em', value: 2 }],
    fontWeight: '700'
  },
  h2: {
    fontSize: [{ unit: 'em', value: 1.8 }],
    fontWeight: '700'
  },
  h3: {
    fontSize: [{ unit: 'em', value: 1.6 }],
    fontWeight: '500'
  },
  h4: {
    fontSize: [{ unit: 'em', value: 1.4 }],
    fontWeight: '500'
  },
  h5: {
    fontSize: [{ unit: 'em', value: 1.2 }],
    fontWeight: '500'
  },
  h6: {
    fontSize: [{ unit: 'em', value: 1 }],
    fontWeight: '400'
  },
  'btn-fullwidth': {
    width: [{ unit: '%H', value: 1 }]
  },
  // ******* LOGIN *******
  '#loginPage': {
    width: [{ unit: '%H', value: 0.8 }],
    margin: [{ unit: 'px', value: 0 }, { unit: 'string', value: 'auto' }, { unit: 'px', value: 0 }, { unit: 'string', value: 'auto' }]
  },
  '#loginPage h1': {
    textAlign: 'center'
  },
  // ******** NOTIFICATION EMAIL ***
  imgEmail: {
    maxWidth: [{ unit: '%H', value: 1 }],
    height: [{ unit: 'string', value: 'auto' }]
  },
  // ******  HOME ***********
  '#homepage': {
    display: 'flex',
    flexWrap: 'wrap',
    justifyContent: 'space-around',
    marginTop: [{ unit: 'px', value: 30 }]
  },
  '#homepage img': {
    textAlign: 'center',
    maxWidth: [{ unit: '%H', value: 1 }],
    height: [{ unit: 'string', value: 'auto' }]
  },
  '#homepage h1': {
    fontSize: [{ unit: 'em', value: 2.8 }]
  },
  '#homepage p': {
    fontSize: [{ unit: 'em', value: 1.8 }],
    textAlign: 'left'
  },
  // **** TEMPLATE ***********
  nav: {
    display: 'flex',
    flexWrap: 'wrap',
    justifyContent: 'space-between',
    padding: [{ unit: 'px', value: 0 }, { unit: 'px', value: 20 }, { unit: 'px', value: 0 }, { unit: 'px', value: 20 }]
  },
  'nav a': {
    marginRight: [{ unit: 'px', value: 10 }]
  },
  'nav a:hover': {
    color: 'black'
  },
  '#createPlanningButton': {
    marginTop: [{ unit: 'px', value: 20 }],
    float: 'right'
  },
  // *********** CALENDAR *******
  activeday: {
    width: [{ unit: '%H', value: 0.14 }],
    float: 'left'
  },
  notactiveday: {
    width: [{ unit: '%H', value: 0.14 }],
    float: 'left'
  },
  'activeday h6': {
    textAlign: 'center'
  },
  'notactiveday h6': {
    textAlign: 'center'
  },
  timeSlot: {
    padding: [{ unit: 'px', value: 2 }, { unit: 'px', value: 2 }, { unit: 'px', value: 2 }, { unit: 'px', value: 2 }],
    border: [{ unit: 'px', value: 1 }, { unit: 'string', value: 'solid' }, { unit: 'string', value: 'darkblue' }],
    textAlign: 'center',
    cursor: 'pointer'
  },
  selected: {
    backgroundColor: '#80cbc4'
  },
  booked: {
    backgroundColor: 'grey',
    color: 'darkgrey'
  },
  'booked:after': {
    fontFamily: '"Font Awesome 5 Free"',
    fontWeight: '900',
    content: '"\f023"',
    textAlign: 'right',
    fontSize: [{ unit: 'px', value: 12 }],
    color: 'darkred'
  },
  noSelectable: {
    backgroundColor: 'white',
    color: 'lightgrey',
    cursor: 'default'
  },
  '#modal2-informations': {
    color: 'darkblue'
  },
  clearBooking: {
    fontSize: [{ unit: 'px', value: 16 }],
    float: 'right',
    color: '#c2185b',
    cursor: 'pointer'
  }
});
