if [[ -n ${ZSH_VERSION-} ]]; then
    autoload -U +X bashcompinit && bashcompinit
fi

_complete_sf2_app_console() {
    local cur

    COMPREPLY=()
    cur="${COMP_WORDS[COMP_CWORD]}"

    # Assume first word is the actual app/console command
    generator="${COMP_WORDS[0]}"

    if [[ ${COMP_CWORD} == 1 ]] ; then
        # No command found, return the list of available commands
        cmds=` ${generator}  --no-ansi | sed -n -e '/^Available commands/,//p' | grep -n '^ ' | sed -e 's/^ \+//' | awk '{ print $2 }'`
    else
        # Commands found, parse options
        cmds=` ${generator} ${COMP_WORDS[1]} --no-ansi --help | sed -n -e '/^Options/,/^$/p' | grep -n '^ ' | sed -e 's/^ \+//' | awk '{ print $2 }'`
    fi

    COMPREPLY=( $(compgen -W "${cmds}" -- ${cur}) )
    return 0
}

export COMP_WORDBREAKS="\ \"\\'><=;|&("
complete -F _complete_sf2_app_console generator
