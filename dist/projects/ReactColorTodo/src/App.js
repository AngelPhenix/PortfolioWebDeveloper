import React from 'react';
import './App.css';
// import {TodoList} from './components/TodoList';
import {Card} from './components/Card';

export class App extends React.Component {
  render() {
    return (
      // <div className="container">
      //   <TodoList/>
      // </div>

      <div className="main_container">
        <Card bgColor='#00ADB5'/>
        <Card bgColor='#F8B500'/>
        <Card bgColor='#FC3C3C'/>
        <Card bgColor='#02A676'/>
      </div>
    )
  }
}