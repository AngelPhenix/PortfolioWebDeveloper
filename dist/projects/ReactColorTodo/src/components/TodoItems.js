import React from 'react';
import FlipMove from 'react-flip-move';

export class TodoItems extends React.Component {
    // Method used to put tasks inside a <li> element
    createTasks = item => {
        return (
            <li 
            onClick={()=>this.props.deleteItem(item.key)} 
            key={item.key}>
            {item.text}
            </li>
        );
    }

    render(){
        // Stores each task contained in TodoList state inside array of objects
        // key = value (unique id)
        // text = task
        var allTodos = this.props.todoTasks;
        // For each object inside allTodos array, apply the createTasks method and stores result
        // now in a <li> element, inside another array
        var listItems = allTodos.map(this.createTasks);

        return (
            <ul className="taskList">
            <FlipMove duration={250} easing="ease-out">
                {listItems}
            </FlipMove>
            </ul>
        );
    }
}