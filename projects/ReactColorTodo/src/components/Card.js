import React from 'react'
import {Cardcolor} from './Cardcolor'
import {Colorhex} from './Colorhex'

export class Card extends React.Component {
  render() {
    const cardStyle = {
        height: 180,
        width: 150,
        backgroundColor: '#fff',
        margin: '20px',
        WebkitFilter: 'drop-shadow(0px 0px 5px #666)',
        filter: 'drop-shadow(0px 0px 5px #666)'
    }

    return (
        <div style={cardStyle}>
            <Cardcolor bgColor={this.props.bgColor}/>
            <Colorhex color={this.props.bgColor}/>
        </div>
    )
  }
}
