import React from 'react';
import {TodoItems} from './TodoItems';

export class TodoList extends React.Component {
    constructor(props){
        super(props);
        this.state = {
            items: []
        }
    }

    addItem = (e) => {
        e.preventDefault();
        // If the value isn't empty, add the value to a variable
        // with the value as text and a unique key
        if(this._taskInput.value !== ''){
            var newItem = {
                text: this._taskInput.value,
                key: Date.now()
            };
            // Change the state of TodoList by pushing the newItem in items
            this.setState(prevState => {
                return {
                    items: prevState.items.concat(newItem)
                }
            });
            // Reset the text inside the input since it's added
            this._taskInput.value = '';
        }
    }

    // Method deleting the task clicked on
    deleteItem = itemKey => {
        // If return == true (task key = key clicked on), ignore it.
        // If return == false, add task to new array
        var filteredItems = this.state.items.filter(task => {
            return (task.key !== itemKey)
        })

        // Replacing the whole state items by the new array 
        // Without the task which has the key we clicked on
        this.setState({
            items: filteredItems
        });
    }

    render() {
        return (
            <div className="todoListMain">
                <form onSubmit={this.addItem}>
                    <input 
                        ref = {a => this._taskInput = a}
                        placeholder="Enter task">
                    </input>
                    <button type="submit">Add</button>
                </form>
                <TodoItems todoTasks={this.state.items} deleteItem={this.deleteItem}/>
            </div>
        );
    }
}