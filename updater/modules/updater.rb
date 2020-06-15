    module updater
        System:Call(MLib:updateCheck())
        if MLib:updater(true)
            System:Out('{Updates:number} found')
            System:Call(MLib:PerformUpdates())
        else
            def goLog
                LogMessage('No updates found.')
                break
            end
        end