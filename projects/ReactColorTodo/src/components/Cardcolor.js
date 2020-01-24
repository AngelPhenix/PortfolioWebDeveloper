import React from 'react';

export class Cardcolor extends React.Component {
    render() {
    const CardColorStyle = {
        backgroundColor: this.props.bgColor,
        width: '100%',
        height: '85%',
        marginBottom: '5px'
    }

    return (
      <div style={CardColorStyle}>
      </div>
    )
  }
}
