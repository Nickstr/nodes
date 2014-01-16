class Test

result = system("make test")

puts result

system('terminal-notifier -title "Tests" -message "test"')


end