import React from 'react'
import {Tracks} from '../tracks/Tracks'
import {Search} from '../tracks/Search'

// export inside .container the two components
export const Index = () => {
  return (
    <React.Fragment>
        <Search />
        <Tracks />
    </React.Fragment>
  )
}